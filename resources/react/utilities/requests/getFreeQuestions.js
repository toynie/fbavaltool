import axios from "../axios";

const getFreeQuestions = (businessType) => {
    const part = 1;
    return axios.get('/question/answers/all', {
        params: {
            busstype: businessType,
            part
        }
    });
}

export default getFreeQuestions;
