module.exports = app => {
    const mahasiswa = require ("../controllers/mahasiswa.controller");
    const router = require('express').Router();


    router.get("/", mahasiswa.findAll);             // GET localhost:8000/mahasiswa
    router.get("/:id", mahasiswa.show);             // GET localhost:8000/mahasiswa/{{id}}
    router.post("/", mahasiswa.create);             // POST localhost:8000/mahasiswa
    router.put("/:id", mahasiswa.update);           // PUT localhost:8000/mahasiswa/{{id}}
    router.delete("/:id", mahasiswa.delete);        // DELETE localhost:8000/mahasiswa/{{id}}

    app.use("/mahasiswa",router);
}

