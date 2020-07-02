import axios from 'axios'
import axiosRetry from 'axios-retry'
import { interceptors as loaderInterceptor } from '@/dmw/loader'
import notFoundInterceptor from './notFoundInterceptor'

let api = axios.create({
    baseURL: process.env.VUE_APP_BASE_URL + 'api/' + process.env.VUE_APP_API_VERSION + '/'
})

axiosRetry(api, {
    retries: 3,
    retryDelay: axiosRetry.exponentialDelay()
})

api.interceptors.request.use(loaderInterceptor.request)
api.interceptors.response.use(loaderInterceptor.response)

api.interceptors.request.use(notFoundInterceptor.request)
api.interceptors.response.use(...notFoundInterceptor.response)

export default api
