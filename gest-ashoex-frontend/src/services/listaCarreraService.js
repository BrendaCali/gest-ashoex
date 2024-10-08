const fetchListaCarrera = async () => {
    const response = await fetch('http://localhost:8000/api/carreras');
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return await response.json();
};

export default fetchListaCarrera;