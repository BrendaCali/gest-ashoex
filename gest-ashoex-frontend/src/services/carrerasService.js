// services/carrerasService.js
const fetchCarreraStatus = async () => {
    const response = await fetch('http://localhost:8000/api/carreras');
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return await response.json();
};

const carrerasService = {
    fetchCarreraStatus,
};

export default carrerasService;