import dictionary from './dictionary'

export default message => {
    return message.split('.').reduce((accumulator, key) => {
        if (typeof accumulator[key] === 'undefined') {
            return message
        }

        return accumulator[key]
    }, dictionary)
}
