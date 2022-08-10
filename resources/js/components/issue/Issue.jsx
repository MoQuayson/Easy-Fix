import React,{Component} from "react";
import ReactDOM from 'react-dom';
import IssueTable from './IssueTable'

class Issue extends Component{

    render(){
        return(
            <>
                <IssueTable/>
            </>
        )
    }
}
export default Issue;

if(document.getElementById('issueSection'))
{
    ReactDOM.render(<Issue />, document.getElementById('issueSection'));
}
