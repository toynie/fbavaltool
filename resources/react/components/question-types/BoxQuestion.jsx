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
    &:hover, &.active {
       text-decoration: none !important;
       color: #fff;
       background: #20277f;
    }
`

class BoxQuestion extends React.PureComponent {

    state = {
        active: null
    }

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
                            <ButtonOption key={option.value} className={this.state.active === option.value ? "active" : ""} onClick={() => {
                                this.setState({ active: option.value })
                                this.props.onChangeValue({
                                    value: option.value,
                                    next_question: this.props.next_question
                                })
                            }}>
                                {option.label}
                            </ButtonOption>
                        </div>
                    })}
                </div>
            </Container>
        )
    }
}

export default BoxQuestion;
