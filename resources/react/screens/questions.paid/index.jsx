import React from 'react'
import styled from "styled-components";
import getQuestionFromItemType from "../../utilities/getQuestionFromItemType";
import "../../../../node_modules/awesome-react-steps/lib/css/arrows.css";
import { Arrows } from "awesome-react-steps";

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

const Container = styled.div`
    .Arrows {
        background: #DDDDDD;
    }

    /* The element which holds a step */
    .Arrows--step {
        font-size: 14px;
        font-weight: 600 !important;
        text-transform: uppercase;
    }

    /* The SVG element used to draw the arrow in the background of each step */
    .Arrows--step--arrow {
    }

    /* The elements for the number and the label of each step */
    .Arrows--step--number {
        display: none;
    }
    .Arrows--step--label {
        font-size: 14px;
        font-weight: 600 !important;
        text-transform: uppercase;
        color: #151B65;
    }

    .Arrows--step__current {
        background: #151B65;
        .Arrows--step--content {
            background: #151B65;
        }
        .Arrows--step--label {
            color: #fff;
        }
        .Arrows--step--arrow {
            background: #151B65;
        }
    }

    /* Steps before the current step */
    .Arrows--step__passed {
    }

    /* Steps after the current step */
    .Arrows--step__coming {
    }

    /* Invalid step */
    .Arrows--step__invalid {
    }

    /* Step is done */
    .Arrows--step__done {
    }

    /* Step was skipped */
    .Arrows--step__skipped {
    }
`

class QuestionsPaidScreen extends React.PureComponent {
    render() {
        return (
            <Container>
                <Arrows
                    model={{
                        steps: [
                            { label: "General" },
                            { label: "Performance" },
                            { label: "Transferability" },
                            { label: "Transferability" },
                            { label: "Transferability" },
                            { label: "Transferability" },
                        ],
                        current: 0
                    }}
                />;
                <FormContainer>
                    {stub.map((item) => {
                        const type = item.type;
                        const questionValue = getQuestionFromItemType(type);
                        return React.createElement(questionValue, {
                            item,
                            key: type.question_title
                        })
                    })}
                </FormContainer>
                <CallToActionButton disabled>CALCULATE VALUE</CallToActionButton>
            </Container>
        )
    }
}

export default QuestionsPaidScreen;
