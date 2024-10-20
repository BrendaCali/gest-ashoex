import { useEffect, useState } from 'react';
import fetchHealthStatus from '../../services/healthService.js';
import reactLogo from '../../assets/react.svg';
import viteLogo from '/vite.svg';

const HealthCheck = () => {
    const [status, setStatus] = useState({});
    const [error, setError] = useState(null);

    useEffect(() => {
        const getHealthStatus = async () => {
            try {
                const data = await fetchHealthStatus();
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
                <a href="https://vitejs.dev" target="_blank">
                    <img src={viteLogo} className="logo" alt="Vite logo" />
                </a>
                <a href="https://react.dev" target="_blank">
                    <img src={reactLogo} className="logo react" alt="React logo" />
                </a>
            </div>
            <div>
                <h2>Health Check</h2>
                {error && <p>Error: {error}</p>}
                {status.status ? <h3>Status:  {status.status}</h3> : <h3>Loading...</h3>}
                {status.database ? <h3>Database:  {status.database}</h3> : <h3>Connecting database...</h3>}
            </div>
        </>
    );
};

export default HealthCheck;
