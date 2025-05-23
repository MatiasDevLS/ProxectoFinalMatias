import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class ProductosService {

  constructor(public http:HttpClient) { }

  public getProductos(){
    return this.http.get('http://127.0.0.1:8000/exportarTodoProducto')
  }

  public getProducto(id:string){
    return this.http.get('http://127.0.0.1:8000/exportarProducto/'+id)
  }

  public getProductosAleatorios(id:string){
    return this.http.get('http://127.0.0.1:8000/exportarAleatorio/'+id)
  }
}
