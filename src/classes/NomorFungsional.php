<?php

namespace Lab\classes;

class NomorFungsional extends LegacyNomor
{
	public function __construct()
    {
        parent::__construct();
    }

	public function bilangan($bilangan)
	{
		return parent::setbilangan($bilangan);
	}
}