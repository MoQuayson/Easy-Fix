import React,{Component} from "react";
import ReactDOM from 'react-dom';
import PermissionTable from './PermissionTable'

class Permission extends Component{

    render(){
        return(
            <>
                <PermissionTable/>
            </>
        )
    }
}
export default Permission;

if(document.getElementById('permissionSection'))
{
    ReactDOM.render(<Permission />, document.getElementById('permissionSection'));
}
