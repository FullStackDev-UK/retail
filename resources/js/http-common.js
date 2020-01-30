import axios from 'axios';

const token = 'MY_API_KEY';

export const HTTP = axios.create({
    baseURL: ``,

    headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token
    }
})