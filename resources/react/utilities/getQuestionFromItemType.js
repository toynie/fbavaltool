import TextQuestion from "../components/question-types/TextQuestion";
import SelectQuestion from "../components/question-types/SelectQuestion";
import BoxQuestion from "../components/question-types/BoxQuestion";
import NumberQuestion from "../components/question-types/NumberQuestion";
import PercentageQuestion from "../components/question-types/PercentageQuestion";
import MultipleValArrayQuestion from "../components/question-types/MultipleValArrayQuestion";

/*  1 = select (button group)
            2 = list  //blank
            3 = yes no// button group yes or no only
            4 = radio
            5 = val int (input integer)
            6 = check list
            7 = multiple val array (multiple input answer)
            8 = Integer Range Question
            9 = Conditional value with customize valuation effect
            10 = hidden question
            11 = Integer Range Question Percentage
         */
const getQuestionFromItemType = (type) => {
    switch (type) {
        case 1:
            return BoxQuestion;
        case 2:
            return SelectQuestion;
        case 3:
            return BoxQuestion;
        case 4:
            return TextQuestion;
        case 5:
            return NumberQuestion;
        case 7:
            return MultipleValArrayQuestion;
        case 11:
            return PercentageQuestion;
        default:
            return TextQuestion;
    }
}

export default getQuestionFromItemType;
