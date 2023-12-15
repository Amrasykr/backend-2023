const express = require('express')
const student = require('../data/students')

class StudentsController{
    index(req, res){
        const response = {
            message : "Menampilkan data students",
            data : student
        }
        res.json(response)
    }

    store (req, res){
        const {nama} = req.body;
        student.push(nama)

        const response = {
            message : `Menambahkan data student dengan ${nama}`,
            data : student
        }
        res.json(response)
    }

    update(req, res){
        const{id} = req.params;
        const{nama} = req.body;
    
        student[id] = nama
        const response = {
            message : `Mengubah data student id ${id} data ${nama}`,
            data : student
        }
        res.json(response)
    }

    destroy(req, res){
        const{id} = req.params;

        student.splice(id, 1);
        const response = {
            message : `Menghapus data student id ${id}`,
            data : student
        }
        res.json(response)
    }
}

const StudentController = new StudentsController;
module.exports=StudentController;