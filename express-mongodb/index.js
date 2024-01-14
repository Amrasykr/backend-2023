const express = require('express');
const cors = require('cors');
const db = require("./app/models/index.js");
const app = express();

const corsOptions = {
    origin: '*',
};

// Register cors middleware
app.use(cors(corsOptions));
app.use(express.json());

// Connect to the database
db.mongoose.connect(db.url)
    .then(() => {
        console.log("Connected to the database");
    })
    .catch((err) => {
        console.error("Error connecting to the database:", err);
    });

    
// Membuat routes
app.get("/", (req, res) => {
    res.json({ message: "Hello World!" });
});


// Memanggil routes mahasiswa
require("./app/routes/mahasiswa.route.js")(app);

const PORT = process.env.PORT || 8000;
app.listen(PORT, () => {
    console.log(`Server started on port ${PORT}`);
});
