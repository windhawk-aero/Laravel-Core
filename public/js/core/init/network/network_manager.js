import axios from 'axios';
import { API_BASE_URL, HEADERS } from '../../constant/api_client_constant';

const axiosClient = axios.create({
    baseURL: API_BASE_URL,
    withCredentials: true,
    headers: HEADERS,
});

axiosClient.interceptors.response.use(
    function(response) {
        return response;
    },
    function(error) {
        let res = error.response;
        console.error('Hata ' + res.status);
        return Promise.reject(error);
    }
);
axiosClient.defaults.paramsSerializer = (params) => {
    // Sample implementation of query string building
    let result = '';
    Object.keys(params).forEach(key => {
        result += `${key}=${encodeURIComponent(params[key])}&`;
    });
    return result.substring(0, result.length - 1);
}


export default axiosClient;
