import React from 'react'
import styled from 'styled-components'
import {Button, Spinner} from "react-bootstrap";

import ProgressBar from "../../components/ProgressBar";
import getQuestionFromItemType from "../../utilities/getQuestionFromItemType";
import getFreeQuestions from "../../utilities/requests/getFreeQuestions";

const FormContainer = styled.div`
    padding: 36px;
    background: #e5e5e5;
`

const LoaderContainer = styled.div`
    display: flex;
    align-items: center;
    justify-content: center;
`

const CallToActionButton = styled.button`
    background: #65D6A8;
    text-align: center;
    width: 200px;
    text-transform: uppercase;
    font-weight: 800 !important;
    color: #fff;
    font-size: 14px;
    margin: 0 auto;
    display: block;
    margin-top: 16px;
    padding-top: 16px;
    padding-bottom: 16px;
`

const stub = [
    {
        question_title: "What vertical is the business in?",
        type: "select",
        options: [
            {
                label: "Test One",
                value: "test 1"
            },
            {
                label: "Test Two",
                value: "test 2"
            }
        ]
    },
    {
        question_title: "When did your business first starting generating profit?",
        type: "box",
        options: [
            {
                label: "1 - 2 years",
                value: "1"
            },
            {
                label: "2 - 4 years",
                value: "2"
            }
        ]
    },
    {
        question_title: "What is the total revenue for the trialing 12 years?",
        type: "number",
        placeholder: "Please input a number..",
        appends: "%"
    },
    {
        question_title: "Some additional questions",
        type: "text",
        placeholder: "Please input an information"
    }
];

const QuestionContainer = styled.div`
    margin-top: 42px;
    margin-bottom: 42px;
`

class QuestionsFreeScreen extends React.PureComponent {

    state = {
        questions: [],
        isLoading: false,
        shownQuestions: [],
        progress: 0
    }

    getData = async () => {
        this.setState({isLoading: true})
        const data = await getFreeQuestions(3);
        this.setState({
            isLoading: false,
            questions: data.data.questions,
            shownQuestions: data.data.questions.length > 0 ? [data.data.questions[0].id] : [],
            progress: Math.ceil(1 / data.data.questions.length * 100)
        })
    }

    componentDidMount() {
        this.getData();
    }

    onChangeValue = (key) => (params) => {
        const shownQuestions = this.state.shownQuestions;
        if (!shownQuestions.includes(params.next_question)) {
            this.setState({
                shownQuestions: [...this.state.shownQuestions, params.next_question],
                progress: Math.ceil(this.state.shownQuestions.length / this.state.questions.length * 100)
            })
        }
    }

    render() {
        const questions = this.state.questions;
        return (
            <>
                <ProgressBar now={this.state.progress} />
                <FormContainer>
                    {this.state.isLoading &&
                        <LoaderContainer>
                            <Spinner animation={"border"}/>
                        </LoaderContainer>
                    }
                    {questions.sort((a, b) => parseInt(a.free_index) > parseInt(b.free_index)  ? 1 : -1).map((question, index)=> {
                        const questionValue = getQuestionFromItemType(question.type)
                        return <QuestionContainer>{React.createElement(questionValue, {
                            item: {
                                question_title: question.name,
                                placeholder: question.q_info,
                                options: question.answers ? question.answers.map(answer => {
                                    return {
                                        value: answer.id,
                                        label: answer.userInput,
                                    }
                                }) : [],
                                pop_under_comment: question.popUnderComment,
                                shown: this.state.shownQuestions.includes(question.id)
                            },
                            next_question: questions.length > index + 1 ? questions[index + 1].id : null,
                            key: `${question.id}-question`,
                            onChangeValue: this.onChangeValue(question.id)
                        })}</QuestionContainer>
                    })}
                    {/*{stub.map((item) => {*/}
                    {/*    const type = item.type;*/}
                    {/*    const questionValue = getQuestionFromItemType(type);*/}
                    {/*    return React.createElement(questionValue, {*/}
                    {/*        item,*/}
                    {/*        key: type.question_title*/}
                    {/*    })*/}
                    {/*})}*/}
                </FormContainer>
                {this.state.progress === 100 && <CallToActionButton>CALCULATE VALUE</CallToActionButton> }

            </>
        )
    }
}

export default QuestionsFreeScreen;
