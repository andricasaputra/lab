// const version = 'sile::';

// // Caches for different resources

// const coreCacheName = version + 'core';
// const pagesCacheName = version + 'pages';
// const assetsCacheName = version + 'assets';
// const apiCacheName = version + 'apis';

// var coreCacheUrls = [
//   '/',
//   'offlineAdmin.html',
//   'assets/css/bootstrap.min.css',
//   'assets/css/font-awesome.min.css',
//   'assets/css/sb-admin.css',
//   'assets/css/style.css',
//   'assets/css/plugins/timeline/timeline.css',
//   'assets/dataTables/datatables.min.css',
//   'assets/dataTables/DataTables-1.10.16/css/dataTables.bootstrap.min.css',
//   'assets/sweetalert2-master/dist/sweetalert2.css',
//   'assets/css/style2.css',
//   'assets/css/bootstrap-datepicker.css',
//   'assets/css/bootstrap-select.min.css',
//   'assets/js/jquery-3.2.1.min.js',
//   'assets/js/labnew.js',
//   'assets/js/labkhnew.js',
//   'assets/js/labkhnewlabparasit.js',
//   'assets/js/bootstrap-confirmation.js',
//   'assets/js/plugins/metisMenu/jquery.metisMenu.js',
//   'assets/js/sb-admin.js',
//   'assets/sweetalert2-master/dist/sweetalert2.js',
//   'assets/js/bootstrap-datepicker.js',
//   'assets/dataTables/DataTables-1.10.16/js/jquery.dataTables.min.js',
//   'assets/js/bootstrap-select.min.js',
//   'assets/dataTables/DataTables-1.10.16/js/dataTables.bootstrap.min.js',
//   'assets/js/numbers_no_ellipses.js',
//   'assets/js/typeahead.min.js',
//   'assets/img/silelogo.jpg',
//   'assets/img/logolabfix.jpg',
//   'assets/img/logolabfixkan.png',
//   'assets/img/logolabhorizontal.png',
//   'assets/img/logoskp4.jpg',
//   'assets/img/logoskpfix.png',
//   'assets/img/logoskpkan.png',
//   'assets/img/boxfix.png',
//   'assets/img/checkfix.png',
//   'assets/img/load.gif',
//   'assets/img/offline.png'

// ];


// // Remove old caches that done't match current version
// function clearCaches() { 
//   return caches.keys().then(function(keys) {
//     return Promise.all(keys.filter(function(key) {
//         return key.indexOf(version) !== 0;
//       }).map(function(key) { 
//         return caches.delete(key);
//       })
//     );
//   });
// }

// // Trim specified cache to max size
// function trimCache(cacheName, maxItems) {
//   caches.open(cacheName).then(function(cache) {
//     cache.keys().then(function(keys) {
//       if (keys.length > maxItems) {
//         cache.delete(keys[0]).then(trimCache(cacheName, maxItems));
//       }
//     });
//   });
// }

// self.addEventListener('message', event => {
//   if (event.data.command == 'trimCaches') {
//     trimCache(pagesCacheName, 30);
//     trimCache(assetsCacheName, 30);
//   }
// });

// /*Install ServiceWorker And Add Files to Cache*/
// self.addEventListener('install', event => {
//   event.waitUntil(
//     caches.open(version + 'begin').then(cache => {
//       return cache.addAll(coreCacheUrls);
//     })
//   );
// });


// /*Delete Cache*/
// self.addEventListener('activate', event => {
//   event.waitUntil(
//     clearCaches().then( () => { 
//       return self.clients.claim(); 
//     })
//   );
// });


// /*Fetching...*/
// self.addEventListener('fetch', event => {

//   let request = event.request,
//   acceptHeader = request.headers.get('Accept');

//   /*HTML Requests only or pages*/
//   if (acceptHeader.indexOf('text/html') !== -1) {

//     /*Try network first*/
//     /*Fresh Data*/
//     event.respondWith(
//       fetch(request).then( res => {
//         return caches.open(pagesCacheName).then( cache => {   
//             /*save the response for future*/
//             cache.put(request.url, res.clone());  
//             return res; 
//         });
//       /*fallback mechanism */  
//       }).catch(function(){
//           return caches.match(request).then( response => {
//             if (response) {
//                 return response;
//             }
//             return caches.match('assets/img/offline.png');
//           });                    
//       })
//     );
 
//   }else{
     
//     if(request.url.indexOf('https') > -1){

//         event.respondWith(
//           caches.match(request)
//             .then( response => { 
//                 /*if valid response is found in cache return it*/  
//                 if (response) {
//                   return response;  
//                 /*else fetch from internet*/  
//                 } else {
//                   return fetch(request).then( res => {
//                     return caches.open(assetsCacheName).then( cache => {   
//                         /*save the response for future*/
//                         cache.put(request.url, res.clone());  
//                         return res; 
//                     });
//                   /*fallback mechanism */  
//                   }).catch(function(){
//                       return caches.match(request).then( response => {
//                         if (response) {
//                             return response;
//                         }
//                         return caches.match('assets/img/offline.png');
//                       });                    
//                   });         
//                 }
//           })
//         );
        
//     }
        
//   }
// });
