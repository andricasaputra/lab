<?php

namespace Lab\config;

class Database
{
    private static $connection;
    private static $instance;
    private $host     = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "Backupsile";

    public static function getInstance()
    {
        if (!self::$instance) {

            self::$instance = new self();
        }

        return self::$instance;
    }

    // Constructor

    private function __construct()
    {
        self::$connection = new \mysqli($this->host, $this->username, $this->password, $this->database);

        // Error handling

        if (self::$connection->connect_error) {

            trigger_error("Failed to connect to MySQL: " . self::$connection->connect_error, E_USER_ERROR);

        }

        // $query = "SELECT db FROM set_db ORDER BY id DESC LIMIT 1";

        // $this->database = self::$connection->query($query)->fetch_object()->db;

        // self::$connection = new \mysqli($this->host, $this->username, $this->password, $this->database);

        // // Error handling

        // if (self::$connection->connect_error) {

        //     trigger_error("Failed to connect to MySQL: " . self::$connection->connect_error, E_USER_ERROR);

        // }

    }

    // Magic method clone is empty to prevent duplication of connection

    private function __clone()
    {

        /*set null*/

    }

    // Magic method wakeup is empty to prevent serialize connection

    private function __wakeup()
    {

        /*set null*/

    }

    // Get mysqli connection

    public function getConnection()
    {

        return self::$connection;

    }

    // Close all connections

    public static function destroy()
    {

        @$a = self::$connection->close();

        if ($a === true) {

            return 'Succesfully Not Connected';

        } else {

            return 'Still Connected';

        }

    }

    public static function ShowDb()
    {
        $result = self::getConnection()->query("SHOW DATABASES");
        while ($row = $result->fetch_array()) {
            $db[] = $row[0];
        }

        return $db;
    }

    public static function setExportTables($tables, $backup_name, $values)
    {

        self::ExportTables($tables, $backup_name, $values);

    }

    private function ExportTables($tables = false, $backup_name = false, $values = false)
    {
        set_time_limit(3000);
        self::$connection->query("SET NAMES 'utf8'");
        $queryTables = self::$connection->query('SHOW TABLES');
        while ($row = $queryTables->fetch_row()) {
            $target_tables[] = $row[0];
        }
        if ($tables !== false) {
            $target_tables = array_intersect($target_tables, $tables);
        }
        $content = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--\r\n-- Database: `" . $name . "`\r\n--\r\n\r\n\r\n";
        foreach ($target_tables as $table) {
            if (empty($table)) {
                continue;
            }
            $result        = self::$connection->query('SELECT * FROM `' . $table . '`');
            $fields_amount = $result->field_count;
            $rows_num      = self::$connection->affected_rows;
            $res           = self::$connection->query('SHOW CREATE TABLE ' . $table);
            $TableMLine    = $res->fetch_row();
            $content .= "\n\n" . $TableMLine[1] . ";\n\n";
            $TableMLine[1] = str_ireplace('CREATE TABLE `', 'CREATE TABLE IF NOT EXISTS `', $TableMLine[1]);
            for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) {
                while ($row = $result->fetch_row()):
                    if ($values == 'structure_only') {

                        continue;

                    } else {

                        //when started (and every after 100 command cycle):
                        if ($st_counter % 100 == 0 || $st_counter == 0) {
                            $content .= "\nINSERT INTO " . $table . " VALUES";
                        }
                        $content .= "\n(";
                        for ($j = 0; $j < $fields_amount; $j++) {
                            $row[$j] = str_replace("\n", "\\n", addslashes($row[$j]));
                            if (isset($row[$j])) {
                                $content .= '"' . $row[$j] . '"';
                            } else {
                                $content .= '""';
                            }
                            if ($j < ($fields_amount - 1)) {
                                $content .= ',';
                            }
                        }
                        $content .= ")";
                        //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                        if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num) {
                            $content .= ";";
                        } else {
                            $content .= ",";
                        }
                        $st_counter = $st_counter + 1;

                    }

                endwhile;
            }
            $content .= "\n\n\n";
        }
        $content .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
        $backup_name = $backup_name ? $backup_name . '___(' . date('H:i:s') . '_' . date('d-m-Y') . ').sql' : $name . '___(' . date('H:i:s') . '_' . date('d-m-Y') . ').sql';
        ob_get_clean();
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header('Content-Length: ' . (function_exists('mb_strlen') ? mb_strlen($content, '8bit') : strlen($content)));
        header("Content-disposition: attachment; filename=\"" . $backup_name . "\"");
        echo $content;
        exit;
    }

    public static function ImportTables($host = null, $user = null, $pass = null, $dbname = null, $sql_file_OR_content)
    {
        if ($host != null && $dbname != null) {

            set_time_limit(3000);
            $SQL_CONTENT = (strlen($sql_file_OR_content) > 300 ? $sql_file_OR_content : file_get_contents($sql_file_OR_content));
            $allLines    = explode("\n", $SQL_CONTENT);
            $mysqli      = new mysqli($host, $user, $pass, $dbname);
            if (self::$connection->connect_errno) {
                echo "Failed to connect to MySQL: " . self::$connection->connect_error;
            }
            $zzzzzz = $mysqli->query('SET foreign_key_checks = 0');
            preg_match_all("/\nCREATE TABLE(.*?)\`(.*?)\`/si", "\n" . $SQL_CONTENT, $target_tables);
            foreach ($target_tables[2] as $table) {
                $mysqli->query('DROP TABLE IF EXISTS ' . $table);
            }
            $zzzzzz = $mysqli->query('SET foreign_key_checks = 1');
            $mysqli->query("SET NAMES 'utf8'");
            $templine = ''; // Temporary variable, used to store current query
            foreach ($allLines as $line) {
                // Loop through each line
                if (substr($line, 0, 2) != '--' && $line != '') {
                    $templine .= $line; // (if it is not a comment..) Add this line to the current segment
                    if (substr(trim($line), -1, 1) == ';') {
                        // If it has a semicolon at the end, it's the end of the query
                        if (!$mysqli->query($templine)) {
                            print('Error performing query \'<strong>' . $templine . '\': ' . $mysqli->error . '<br /><br />');
                        }
                        $templine = ''; // set variable to empty, to start picking up the lines after ";"
                    }
                }
            }
            return 'Restore Database Berhasil!';

        } else {
            
            set_time_limit(3000);

            $SQL_CONTENT = (strlen($sql_file_OR_content) > 300 ? $sql_file_OR_content : file_get_contents($sql_file_OR_content));
            $allLines    = explode("\n", $SQL_CONTENT);
            if (self::$connection->connect_errno) {
                echo "Failed to connect to MySQL: " . self::$connection->connect_error;
            }
            $zzzzzz = self::$connection->query('SET foreign_key_checks = 0');
            preg_match_all("/\nCREATE TABLE(.*?)\`(.*?)\`/si", "\n" . $SQL_CONTENT, $target_tables);
            foreach ($target_tables[2] as $table) {
                self::$connection->query('DROP TABLE IF EXISTS ' . $table);
            }
            $zzzzzz = self::$connection->query('SET foreign_key_checks = 1');
            self::$connection->query("SET NAMES 'utf8'");
            $templine = ''; // Temporary variable, used to store current query
            foreach ($allLines as $line) {
                // Loop through each line
                if (substr($line, 0, 2) != '--' && $line != '') {
                    $templine .= $line; // (if it is not a comment..) Add this line to the current segment
                    if (substr(trim($line), -1, 1) == ';') {
                        // If it has a semicolon at the end, it's the end of the query
                        if (!self::$connection->query($templine)) {
                            print('Error performing query \'<strong>' . $templine . '\': ' . $mysqli->error . '<br /><br />');
                        }
                        $templine = ''; // set variable to empty, to start picking up the lines after ";"
                    }
                }
            }
            return 'Restore Database Berhasil!';

        }

    }

    public static function DeleteTables($host, $user, $pass, $dbname)
    {
        $mysqli = new mysqli($host, $user, $pass, $dbname);
        $mysqli->query('SET foreign_key_checks = 0');
        if ($result = $mysqli->query("SHOW TABLES")) {
            while ($row = $result->fetch_row()) {
                if ($row[0] === 'user' || $row[0] === 'user_kh') {

                    $table = '';

                } else {

                    $table = $row[0];

                }

                $mysqli->query('DROP TABLE IF EXISTS ' . $table);

            }

        }

        $mysqli->query('SET foreign_key_checks = 1');
        $mysqli->close();
        return 'Delete Table Database Berhasil';
    }

}
