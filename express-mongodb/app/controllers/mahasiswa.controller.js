const db = require('../models');
const mahasiswa = db.mahasiswa;



exports.create = (req, res) =>{


    req.body.tanggal_lahir = new Date(req.body.tanggal_lahir);

    mahasiswa.create(req.body)
        .then(() => res.send({message: 'Data Berhasil Ditambahkan'}))
        .catch(err => res.status(500).res.send({message: err}))

}

exports.findAll = (req, res) =>{

    mahasiswa.find()
        .then(data => res.send(data))
        .catch(err => res.status(500).res.send({message: err.message}))
}

exports.show = (req, res) =>{

    const id = req.params.id


    mahasiswa.findById(id)
        .then(data => res.send(data)) 
        .catch(err => res.status(500).res.send({message: err.message}))
}


exports.update = (req, res) =>{

    const id = req.params.id
    req.body.tanggal_lahir = new Date(req.body.tanggal_lahir);

    mahasiswa.findByIdAndUpdate(id, req.body,  {useFindAndModify: false})
        .then(data => {
            if(!data){
                res.status(404).send({message : "Tidak dapat update, data tidak ada"})
            }
            res.send({message : "Data berhasil di update"})
        })
        .catch(err => res.status(500).send({message : err.message}))
}

exports.delete = (req, res) => {
    const id = req.params.id;

    mahasiswa.findOneAndDelete({ _id: id })
        .then(data => {
            if (!data) {
                res.status(404).send({ message: "Tidak dapat delete, data tidak ada" });
            }
            res.send({ message: "Data berhasil di delete" });
        })
        .catch(err => res.status(500).send({ message: err.message }));
};
