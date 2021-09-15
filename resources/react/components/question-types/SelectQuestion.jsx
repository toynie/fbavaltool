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

const QuestionSelect = styled.select`
    width: 100%;
    margin-top: 8px;
    border: 1px solid #151B65 !important;
    border-radius: 0 !important;
    padding: 8px;
    font-size: 14px;
    color: #151B65;
    font-weight: 600 !important;
`

class SelectQuestion extends React.PureComponent {
    render() {
        const item = this.props.item;
        if (!this.props.item.shown) {
            return false;
        }
        return (
            <Container className={"animate__animated animate__fadeIn"}>
                <QuestionLabel>{item.question_title}</QuestionLabel>
                <QuestionSelect onChange={(event) => {
                    this.props.onChangeValue({
                        value: event.target.value,
                        next_question: this.props.next_question
                    })
                }}>
                    {item.options && item.options.map(option => {
                        return <option value={option.value} key={option.value}>{option.label}</option>
                    })}
                </QuestionSelect>
            </Container>
        )
    }
}

export default SelectQuestion;
