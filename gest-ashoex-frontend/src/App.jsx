import { useState } from 'react'
import HealthCheck from './components/health/health.jsx'
import ListaCarreras from './components/carreras/ListaCarreras.jsx'
import { BrowserRouter, Routes, Route } from 'react-router-dom'
import './App.css'
import CarrerasTable from './components/tablaCarreras.jsx'
function App() {

  return (
    <>
    <BrowserRouter>
       <Routes>
          <Route path="/" element={<HealthCheck />} />
          <Route path="/carreras" element={<ListaCarreras />} />
        </Routes>
      </BrowserRouter>
    </>
  )
}

export default App
