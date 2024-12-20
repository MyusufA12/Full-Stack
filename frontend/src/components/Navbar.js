// src/components/Navbar.js
import React from "react";
import { Link } from "react-router-dom";

const Navbar = () => {
  return (
    <nav className="navbar is-primary">
      <div className="navbar-menu">
        <div className="navbar-start">
          <Link to="/" className="navbar-item">
            Daftar Mahasiswa
          </Link>
          <Link to="/tambah" className="navbar-item">
            Tambah Mahasiswa
          </Link>
        </div>
      </div>
    </nav>
  );
};

export default Navbar;
