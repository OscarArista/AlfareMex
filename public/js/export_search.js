export class search {
    constructor(myurlp, mysearchp, ul_add_lip) {
        this.url = myurlp;
        this.mysearch = mysearchp;
        this.ul_add_li = ul_add_lip;
        this.idli = "mylist";
        this.pcantidad = document.querySelector("#pcantidad");
    }

    InputSearch() {
        this.mysearch.addEventListener("input", e => {
            e.preventDefault();
            try {
                let token = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");
                let minimo_letras = 0;
                let valor = this.mysearch.value;
                // console.log(valor);
                if (valor.length > minimo_letras) {
                    let datasearh = new FormData();
                    datasearh.append("valor", valor);
                    fetch(this.url, {
                        headers: {
                            "X-CSRF-TOKEN": token
                        },
                        method: "post",
                        body: datasearh
                    })
                        .then(data => data.json())
                        .then(data => {
                            console.log("Success:", data);
                            this.Showlist(data, valor);
                        })
                        .catch(function(error) {
                            console.error("Error:", error);
                        });
                } else {
                    this.ul_add_li.style.display = "none";
                }
            } catch (error) {}
        });
    }

    Showlist(data, valor) {
        this.ul_add_li.style.display = "block";
        if (data.estado == 1) {
            if (data.result != "") {
                let arrayp = data.result;
                this.ul_add_li.innerHTML = "";
                let n = 0;
                this.Show_list_each_data(arrayp,valor,n);
                let adclasli = document.getElementById("1" +this.idli);
                adclasli.classList.add("selected");
            } else {
                this.ul_add_li.innerHTML = "";
                this.ul_add_li.innerHTML += `
                    <p style="color:red;"><br>No se encontro</p>
                `;
            }
        }
    }

    Show_list_each_data(arrayp, valor, n) {
        for (let item of arrayp) {
            n++;
            let nombre = item.name;
            this.ul_add_li.innerHTML +=`
            <li id="${n+this.idli}" value="${item.name}"class="list-group-item"  style="">
                    <div class="d-flex flex-row" style="">
                    <div class="p-2 text-center divimg" style="">
                        <img src="/img/productos/${item.image}" class="img-thumbnail" width="50" height="50" >
                    </div>
                        <div class="p-2">
                                <strong>${nombre.substr(0,valor.length)}</strong>
                                ${nombre.substr(valor.length)}
                                <p class="card-text">P. venta $ : ${item.price}</p>
                        </div>
                    </div>
            </li>`;
        }
    }
}
