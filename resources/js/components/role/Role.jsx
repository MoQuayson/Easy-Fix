import React,{Component} from "react";
import ReactDOM from 'react-dom';
import RoleTable from './RoleTable'

class Role extends Component{

    render(){
        return(
            <>
                <RoleTable/>
            </>
        )
    }
}
export default Role;

if(document.getElementById('roleSection'))
{
    ReactDOM.render(<Role />, document.getElementById('roleSection'));
}
