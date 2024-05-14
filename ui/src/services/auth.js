import axios from '@/services/axios.js';

// we use this endpoint to check if the user is authenticated or not
export async function isAuthenticated() {
    try {
        const response = await axios.get('/v1/check-auth');
        return response.data.isAuthenticated;
    } catch (error) {
        console.error('Authentication check failed', error);
        return false;
    }
}