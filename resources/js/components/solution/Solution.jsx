import React,{Component} from "react";
import ReactDOM from 'react-dom';
import SolutionTable from './SolutionTable'

class Solution extends Component{

    render(){
        return(
            <>
                <SolutionTable/>
            </>
        )
    }
}
export default Solution;

if(document.getElementById('SolutionSection'))
{
    ReactDOM.render(<Solution />, document.getElementById('solutionSection'));
}
