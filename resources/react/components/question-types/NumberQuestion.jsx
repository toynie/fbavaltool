import React from 'react'
import styled from 'styled-components'

const Container = styled.div`
    margin-top: 14px;
    margin-bottom: 14px;
`

const QuestionLabel = styled.div`
    font-weight: 700 !important;
    color: #151b65;
    font-size: 14px;
    font-family: 'Quicksand', sans-serif;
`

const QuestionTextInput = styled.input`
    margin-top: 8px;
    border: 1px solid #151B65 !important;
    border-radius: 0 !important;
    padding: 4px;
    font-size: 14px;
    color: #151B65;
    font-weight: 600 !important;

    &::-webkit-input-placeholder {
        font-size: 14px !important;
        font-weight: 500 !important;
    }
`

const SubComment = styled.span`
    font-size: 12px;
`

class NumberQuestion extends React.PureComponent {
    render() {
        const item = this.props.item;
        if (!this.props.item.shown) {
            return false;
        }
        return (
            <Container className={"animate__animated animate__fadeIn"}>
                <QuestionLabel>{item.question_title}</QuestionLabel>
                <QuestionTextInput onChange={(event) => {
                    this.props.onChangeValue({
                        value: event.target.value,
                        next_question: this.props.next_question
                    })
                }} placeholder={item.placeholder ? item.placeholder : 'Enter a value'} className={"form-control"} type={"number"} />
                {item.pop_under_comment ? <SubComment>{item.pop_under_comment}</SubComment> : false}
            </Container>
        )
    }
}

export default NumberQuestion;
