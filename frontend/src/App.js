import React, { useState } from "react";
import "./App.css";
import StudentList from "./components/StudentList";
import StudentForm from "./components/StudentForm";

const App = () => {
  const [studentToEdit, setStudentToEdit] = useState(null);
  const [refresh, setRefresh] = useState(false);

  const handleEdit = (student) => {
    setStudentToEdit(student);
  };

  const handleSaveSuccess = () => {
    setStudentToEdit(null); // Hapus mode edit
    setRefresh(!refresh); // Refresh daftar
  };

  return (
    <div>
      <br />
      <br />
      <StudentForm studentToEdit={studentToEdit} onSaveSuccess={handleSaveSuccess} />
      <StudentList onEdit={handleEdit} refresh={refresh} />
      <br />
      <br />
      <br />
      <br />
      <br />
    </div>
  );
};

export default App;
