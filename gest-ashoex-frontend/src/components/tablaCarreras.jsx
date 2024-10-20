import { useEffect, useState } from 'react';
import carrerasService from '../services/carrerasService';


const CarrerasTable = () => {
    const [carreras, setCarreras] = useState([]);
    const [error, setError] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        const getCarreras = async () => {
            try {
                const data = await carrerasService.fetchCarreraStatus();
                setCarreras(data);
                setLoading(false);
            } catch (err) {
                setError(err.message);
                setLoading(false);
            }
        };
        getCarreras();
    }, []);

    if (loading) {
        return <h3>Loading...</h3>;
    }

    if (error) {
        return <p>Error: {error}</p>;
    }

    return (
        <div>
            <h2>Lista de Carreras</h2>
            <table border="1" cellPadding="10" cellSpacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Semestres</th>
                    </tr>
                </thead>
                <tbody>
                    {carreras.length > 0 ? (
                        carreras.map((carrera) => (
                            <tr key={carrera.carrera_id}>
                                <td>{carrera.carrera_id}</td>
                                <td>{carrera.nombre}</td>
                                <td>{carrera.nro_semestres}</td>
                            </tr>
                        ))
                    ) : (
                        <tr>
                            <td colSpan="3">No hay carreras disponibles</td>
                        </tr>
                    )}
                </tbody>
            </table>
        </div>
    );
};

export default CarrerasTable;
