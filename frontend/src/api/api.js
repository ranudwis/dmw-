import axios from 'axios'
import axiosRetry from 'axiosRetry'

let api = axios.create({
    baseURL: process.env.VUE_APP_BASE_URL + 'api/' + process.env.VUE_APP_API_VERSION + '/'
})

axiosRetry(api, {
    retries: 3,
    retryDelay: axiosRetry.exponentialDelay()
})

export default api
