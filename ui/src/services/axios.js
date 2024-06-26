import axios from 'axios';

// Create a global Axios instance to include default settings
// such as headers and `withCredentials: true`, eliminating the need to specify these settings in every Axios request.
const instance = axios.create({
    baseURL: 'http://51.68.172.157/api',
    withCredentials: true,
    headers: {
        'Accept': 'application/json'
    }
});

//TODO: if we need later to do the handling errors globally

// Setup interceptors if needed, e.g., for adding tokens or handling errors globally
instance.interceptors.request.use(config => {
    // Perform actions before every request is sent

    // Retrieve the token from local storage
    const token = localStorage.getItem('jwt');

    // If the token exists, add it to the headers
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }

    return config;
}, error => {
    // Handle errors
    return Promise.reject(error);
});

instance.interceptors.response.use(response => {
    // Any status code that lie within the range of 2xx cause this function to trigger
    return response;
}, error => {
    // Any status codes that falls outside the range of 2xx cause this function to trigger
    return Promise.reject(error);
});

export default instance;