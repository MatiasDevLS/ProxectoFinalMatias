import { Component, OnInit } from '@angular/core';
import { Producto } from '../Models/Producto';
import { ProductosService } from '../services/ProductoService/productos.service';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-pantalla-carrito',
  imports: [FormsModule ],
  templateUrl: './pantalla-carrito.component.html',
  styleUrl: './pantalla-carrito.component.scss'
})
export class PantallaCarritoComponent implements OnInit{
  productos: Producto[] = []
  size: number = 0;
  cantidadSeleccionada: number = 1;
  constructor(private productosService: ProductosService){

  }

  ngOnInit(): void {
    var keys:string = localStorage.getItem('keysCarrito')!
    keys = JSON.stringify(keys)
    keys = keys.replace('"','')
    keys = keys.replace('"','')

    let arrayKeys = keys.split(',')

    this.size = arrayKeys.length
    arrayKeys.forEach((key: string) => {
      this.productosService.getProducto(key).subscribe({
        next: (producto:Producto)=> {
          this.productos.push(producto)
        }
      })
    });
  }


}
