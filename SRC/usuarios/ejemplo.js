document.getElementById('excelUploadForm').addEventListener('submit', async (event) => {
    event.preventDefault();
    const excelFile = document.getElementById('excelFile').files[0];
    
    if (excelFile) {
      // Here, you can use a JavaScript library like 'xlsx' to parse the Excel file.
      // You'll need to install 'xlsx' using npm or include it via CDN.
      // Example code to read the Excel file and process its data:
      const workbook = XLSX.read(await readFile(excelFile), { type: 'binary' });
      const sheetName = workbook.SheetNames[0]; // Assuming the data is in the first sheet
      const excelData = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName]);
      
      // Process each row of the Excel data and register users
      for (const row of excelData) {
        const { Rol, Documento, Nombres, Apellidos, Correo, Grado, Grupo } = row;
        
        // Assuming you have a function to hash passwords
        const hashedPassword = hashPassword(Documento);
        
        // Register the user in the 'Usuarios' table
        const userId = await registerUser(Rol, Documento, hashedPassword);
        
        // Register the beneficiary in the 'Beneficiarios' table
        await registerBeneficiary(userId, Nombres, Apellidos, Correo, Grado, Grupo);
      }
      
      // Display a success message or perform other actions
      console.log('Users registered successfully.');
    }
  });
  