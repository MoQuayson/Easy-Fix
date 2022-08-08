import React,{Component} from "react";
import ReactDOM from 'react-dom';
import UserTable from './user-table'

class User extends Component{

    render(){
        return(
            <>
                <UserTable/>
            </>
        )
    }
}
export default User;

if(document.getElementById('userSection'))
{
    ReactDOM.render(<User />, document.getElementById('userSection'));
}
