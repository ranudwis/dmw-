import axios from 'axios'
import axiosRetry from 'axios-retry'
import { interceptors } from '@/dmw/loader'

let api = axios.create({
    baseURL: process.env.VUE_APP_BASE_URL + 'api/' + process.env.VUE_APP_API_VERSION + '/'
})

axiosRetry(api, {
    retries: 3,
    retryDelay: axiosRetry.exponentialDelay()
})

api.interceptors.request.use(interceptors.request)
api.interceptors.response.use(interceptors.response)

export default api
