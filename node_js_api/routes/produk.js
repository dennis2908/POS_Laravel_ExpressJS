var express = require('express'),
    router = express.Router(),
    produk = require('../controller/produk');
router.get('/', produk.list_view);	
router.get('/view', produk.list_view);
router.post('/save', produk.save);
router.get('/get_brg', produk.get_brg);
router.get('/del/:id', produk.del);
router.post('/get_all/:id', produk.get_all);
router.get('/get_all/:id', produk.get_all);
router.post('/get_brg_id', produk.get_brg_id);
router.post('/get_brg_by_id/:id', produk.get_brg_by_id);
module.exports = router;