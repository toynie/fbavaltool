import React from 'react'
import { BrowserRouter, Switch, Route } from "react-router-dom";
import QuestionsFreeScreen from "./questions.free";
import QuestionsPaidScreen from "./questions.paid";

class Root extends React.PureComponent {
    render() {
        return (
            <BrowserRouter>
                <Switch>
                    <Route path={'/tool/free/:businessType'}>
                        <QuestionsFreeScreen />
                    </Route>
                    <Route path={'/tool/paid/:businessType'}>
                        <QuestionsPaidScreen />
                    </Route>
                </Switch>
            </BrowserRouter>
        )
    }
}

export default Root;
