import React, { useState, useEffect } from "react";
import axios from "axios";

//untuk input
const StudentList = ({ onEdit }) => {
  const [students, setStudents] = useState([]);

  useEffect(() => {
    axios
      .get("http://praktikum-1.test/api/students")
      .then((response) => setStudents(response.data))
      .catch((error) => console.error(error));
  }, []);

  //untuk hapus data
  const handleDelete = (id) => {
    const confirmDelete = window.confirm("Apakah Anda yakin ingin menghapus data ini?");
    if (confirmDelete) {
      axios
        .delete(`http://praktikum-1.test/api/students/${id}`)
        .then(() => {
          setStudents((prevStudents) => prevStudents.filter((student) => student.id !== id));
          alert("Data berhasil dihapus!");
        })
        .catch((error) => console.error("Error:", error));
    }
  };

  return (
    <div className="container mt-5">
      <h2 className="title has-text-centered">Daftar Mahasiswa</h2>
      <div className="table-container">
        <table className="table is-striped is-hoverable is-fullwidth">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>NIM</th>
              <th>Fakultas</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Alamat</th>
              <th>Tanggal Lahir</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            {students.map((student) => (
              <tr key={student.id}>
                <td>{student.id}</td>
                <td>{student.name}</td>
                <td>{student.nim}</td>
                <td>{student.fakultas}</td>
                <td>{student.email}</td>
                <td>{student.phone}</td>
                <td>{student.address}</td>
                <td>{student.dob}</td>
                <td>
                  <button className="button is-warning is-small" onClick={() => onEdit(student)}>
                    Edit
                  </button>
                  <button className="button is-danger is-small ml-2" onClick={() => handleDelete(student.id)}>
                    Delete
                  </button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
};

export default StudentList;
