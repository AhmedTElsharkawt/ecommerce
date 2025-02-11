var myfirstnave = document.getElementById("myfirstnave");
var usertable = document.getElementById("usertable");




window.onscroll = function(){
    var scrollFormTop = scrollY;

    if(scrollFormTop >= 400){
        // show nav 
        myfirstnave.classList.add("fixed-top")

    }
    else{
        // disapear
        myfirstnave.classList.remove("fixed-top")

    }
}





fetch('https://dummyjson.com/users')
.then(res => res.json())
.then(r => {
    console.log(r.users);
    var users = r.users;

    users.forEach(function(user){
        var title = "";
        if(user.gender == "male"){
            title = "MR. ";
        }        
        else if(user.gender == "female"){
            title = "Miss. ";

        }
        else{
            title = "";
        }

        usertable.innerHTML += `
              <tr>
                    <td>${user.id}</td>
                    <td>
                        <img src="${user.image}" width="100px">
                    </td>
                    <td> ${title} ${user.username}</td>
                    <td>${user.email}</td>
                    <td>${user.age}</td>
                    <td>${user.gender == "male" ? '🙎🏻‍♂️' : '💃🏻' }</td>
                </tr>
        
        `
    })
});

