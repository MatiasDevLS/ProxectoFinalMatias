import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class ProductosService {

  constructor(public http:HttpClient) { }

  public getProductos(){
    return this.http.get('http://127.0.0.1:8000/exportarTodo')
  }
}
