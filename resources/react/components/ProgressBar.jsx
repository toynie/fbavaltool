import React from 'react'
import styled from 'styled-components'

const Container = styled.div`
    width: 100%;
    height: 13px;
    background: #c5c5c5;
`

const MainContainer = styled.div`
    position: -webkit-sticky; /* Safari */
    position: sticky;
    top: 0;
    background: #f3f3f3;
    padding-bottom: 8px;
    padding-top: 8px;
    z-index: 9999999;
`

const Tracker = styled.div`
    height: 13px;
    background: #20277F;
    -webkit-transition: width 1s ease-in-out;
    -moz-transition: width 1s ease-in-out;
    -o-transition: width 1s ease-in-out;
    transition: width 1s ease-in-out;
`

const Caption = styled.div`
    margin-top: 16px;
    font-size: 14px;
    font-weight: 600 !important;
    text-align: center;
    color: #20277F;
    margin-bottom: 16px;
`

class ProgressBar extends React.PureComponent {
    static defaultProps = {
        now: 0
    }

    render() {
        return (
            <MainContainer>
                <Container>
                    <Tracker style={{ width: this.props.now <= 5 ? '5%' : `${this.props.now}%` }} />
                </Container>
                <Caption>{`${this.props.now}% Progress`}</Caption>
            </MainContainer>
        )
    }
}

export default ProgressBar

