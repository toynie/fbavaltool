import React from 'react'
import styled from 'styled-components'

const Container = styled.div`
    margin-top: 14px;
    margin-bottom: 14px;
    label {
        margin-top: 8px;
        color: #151b65;
        font-weight: 800 !important;
    }
`

const QuestionLabel = styled.div`
    font-weight: 700 !important;
    color: #151b65;
    font-size: 14px;
    font-family: 'Quicksand', sans-serif;
`

const ButtonOption = styled.a`
    text-align: center;
    display: block;
    padding: 16px;
    border: 1px solid #151B65;
    color: #20277F;
    background: #fff;
    cursor: pointer;
    font-weight: 600 !important;
    margin-top: 8px;
    &:hover {
       text-decoration: none !important;
       color: #fff;
       background: #20277f;
    }
`

const QuestionTextInput = styled.input`
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


class MultipleValArrayQuestion extends React.PureComponent {
    render() {
        const item = this.props.item;
        if (!this.props.item.shown) {
            return false;
        }
        return (
            <Container className={"animate__animated animate__fadeIn"}>
                <QuestionLabel>{item.question_title}</QuestionLabel>
                <div className="row">
                    {item.options && item.options.map(option => {
                        return <div className={"col-md-3 col-sm-6"}>
                            <label>{option.label}</label>
                            <QuestionTextInput key={option.value} placeholder={option.label} onChange={(event) => {
                                this.props.onChangeValue({
                                    value: event.target.value,
                                    next_question: this.props.next_question
                                })
                            }} />
                        </div>
                    })}
                </div>
            </Container>
        )
    }
}

export default MultipleValArrayQuestion;
