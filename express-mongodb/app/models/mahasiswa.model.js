const { Schema } = require("mongoose");

module.exports = mongoose => {
    const schema = Schema(
        {
            nama_lengkap: String,
            jenis_kelamin: String,
            tanggal_lahir: Date,
            Kelas: String,
            Jurusan: String,
            NIM: String,
        },
        {
            timestamps: true,
        }
    );

    schema.method("toJSON", function (){
        const {__v, _id, ...object} = this.toObject();
        object.id = _id;

        return object;
    });



    return mongoose.model("mahasiswa", schema);
};

