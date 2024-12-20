import React, { useState, useEffect } from "react";
import axios from "axios";

const StudentForm = ({ studentToEdit, onSaveSuccess }) => {
  const [id, setId] = useState(null); // ID untuk edit
  const [name, setName] = useState("");
  const [nim, setNim] = useState("");
  const [fakultas, setFakultas] = useState("");
  const [email, setEmail] = useState("");
  const [phone, setPhone] = useState("");
  const [address, setAddress] = useState("");
  const [dob, setDob] = useState("");

  // Jika ada data mahasiswa yang akan diedit, set form dengan datanya
  useEffect(() => {
    if (studentToEdit) {
      setId(studentToEdit.id);
      setName(studentToEdit.name);
      setNim(studentToEdit.nim);
      setFakultas(studentToEdit.fakultas);
      setEmail(studentToEdit.email);
      setPhone(studentToEdit.phone);
      setAddress(studentToEdit.address);
      setDob(studentToEdit.dob);
    }
  }, [studentToEdit]);

  const handleSubmit = (e) => {
    e.preventDefault();
    const student = { name, nim, fakultas, email, phone, address, dob };

    if (id) {
      // Mode edit
      axios
        .put(`http://praktikum-1.test/api/students/${id}`, student)
        .then(() => {
          alert("Data mahasiswa berhasil diperbarui!");
          onSaveSuccess(); // Beri tahu daftar mahasiswa untuk refresh
          clearForm();
          window.location.reload();
        })
        .catch((error) => console.error("Error:", error));
    } else {
      // Mode tambah
      axios
        .post("http://praktikum-1.test/api/students", student)
        .then(() => {
          alert("Data mahasiswa berhasil ditambahkan!");
          onSaveSuccess(); // Beri tahu daftar mahasiswa untuk refresh
          clearForm();
          window.location.reload();
        })
        .catch((error) => console.error("Error:", error));
    }
  };

  const clearForm = () => {
    setId(null);
    setName("");
    setNim("");
    setFakultas("");
    setEmail("");
    setPhone("");
    setAddress("");
    setDob("");
  };

  return (
    <div className="container" style={{ maxWidth: "500px", margin: "0 auto" }}>
      <h1 className="title has-text-centered">{id ? "Edit" : "Tambah"} Mahasiswa</h1>
      <form onSubmit={handleSubmit} className="box">
        {/* Form Fields */}
        <div className="field">
          <div className="control">
            <input className="input" type="text" placeholder="Nama" value={name} onChange={(e) => setName(e.target.value)} required />
          </div>
        </div>

        <div className="field">
          <div className="control">
            <input className="input" type="text" placeholder="NIM" value={nim} onChange={(e) => setNim(e.target.value)} required />
          </div>
        </div>

        <div className="field">
          <div className="control">
            <input className="input" type="text" placeholder="Fakultas" value={fakultas} onChange={(e) => setFakultas(e.target.value)} required />
          </div>
        </div>

        <div className="field">
          <div className="control">
            <input className="input" type="email" placeholder="Email" value={email} onChange={(e) => setEmail(e.target.value)} required />
          </div>
        </div>

        <div className="field">
          <div className="control">
            <input className="input" type="text" placeholder="Telepon" value={phone} onChange={(e) => setPhone(e.target.value)} required />
          </div>
        </div>

        <div className="field">
          <div className="control">
            <input className="input" type="text" placeholder="Alamat" value={address} onChange={(e) => setAddress(e.target.value)} required />
          </div>
        </div>

        <div className="field">
          <div className="control">
            <input className="input" type="date" value={dob} onChange={(e) => setDob(e.target.value)} required />
          </div>
        </div>

        <div className="field is-grouped is-grouped-right">
          <div className="control">
            <button type="submit" className="button is-primary">
              {id ? "Update" : "Tambah"}
            </button>
          </div>
        </div>
      </form>
    </div>
  );
};

export default StudentForm;
