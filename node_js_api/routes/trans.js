var express = require('express'),
    router = express.Router(),
    trans = require('../controller/trans');
router.get('/', trans.list_view);	
router.get('/view', trans.list_view);
router.post('/save', trans.save);
router.get('/get_brg', trans.get_brg);
router.get('/del/:id', trans.del);
router.post('/get_all/:id', trans.get_all);
router.get('/get_all/:id', trans.get_all);
router.post('/get_brg_id', trans.get_brg_id);
router.post('/get_brg_by_id/:id', trans.get_brg_by_id);
module.exports = router;