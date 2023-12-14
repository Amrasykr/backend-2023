// Fungsi untuk menampilkan hasil download
const showDownload = (result) => {
  console.log("Download selesai");
  console.log(`Hasil Download: ${result}`);
};

// Fungsi untuk download file dengan Promise dan async/await
const download = () => {
  return new Promise((resolve) => {
    setTimeout(() => {
      const result = "windows-10.exe";
      resolve(result);
    }, 3000);
  });
};

// Memanggil fungsi download dengan async/await
const initiateDownload = async () => {
  try {
    const result = await download();
    showDownload(result); // Menampilkan hasil download
  } catch (error) {
    console.error('Error during download:', error); // Menampilkan pesan error jika terjadi kesalahan
  }
};

// Memulai proses download
initiateDownload();
