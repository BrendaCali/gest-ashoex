import { useEffect, useState } from 'react';
import fetchListaCarrera from '../../services/listaCarreraService.js';
import reactLogo from '../../assets/react.svg';
import viteLogo from '/vite.svg';

const ListaCarreras = () => {
    const [status, setStatus] = useState([]);
    const [error, setError] = useState(null);

    useEffect(() => {
        const getHealthStatus = async () => {
            try {
                const data = await fetchListaCarrera();
                setStatus(data);
            } catch (err) {
                setError(err.message);
            }
        };
        getHealthStatus();
    }, []);

    return (
        <>
           
            <div>
                <h2>Available Carreras</h2>
                {error && <p style={{ color: 'red' }}>Error: {error}</p>}
                {status.length > 0 ? (
                    <table style={{ border: '1px solid black', width: '100%', textAlign: 'left' }}>
                        <thead>
                            <tr>
                                <th style={{ borderBottom: '1px solid black', padding: '8px' }}>ID</th>
                                <th style={{ borderBottom: '1px solid black', padding: '8px' }}>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            {status.map((carrera) => (
                                <tr key={carrera.id}>
                                    <td style={{ borderBottom: '1px solid black', padding: '8px' }}>{carrera.id}</td>
                                    <td style={{ borderBottom: '1px solid black', padding: '8px' }}>{carrera.nombre}</td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                ) : (
                    <h3>Loading...</h3>
                )}
            </div>
        </>
    );
};

export default ListaCarreras;