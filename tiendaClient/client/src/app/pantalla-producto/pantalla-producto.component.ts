import { Component, Input, OnInit } from '@angular/core';
import { ProductosService } from '../services/ProductoService/productos.service';
import { ActivatedRoute } from '@angular/router';
import { CartaProductoComponent } from '../carta-producto/carta-producto.component';

@Component({
  selector: 'app-pantalla-producto',
  imports: [CartaProductoComponent],
  templateUrl: './pantalla-producto.component.html',
  styleUrl: './pantalla-producto.component.scss'
})
export class PantallaProductoComponent implements OnInit {
  producto!: any
  productosAleatorios!: any[]

  constructor(public productosService: ProductosService, private route: ActivatedRoute) { }

  ngOnInit(): void {
    let productoId = this.route.snapshot.paramMap.get('id');
    this.productosService.getProducto(productoId!).subscribe({
      next: (respond: any) => this.producto = respond
    });
    this.productosService.getProductosAleatorios(productoId!).subscribe({
      next: (respond: any) => this.productosAleatorios = respond
    });
  }

  addCarrito(id: number) {
    if (window.localStorage.getItem('keysCarrito') != null) {
      var ids:any = window.localStorage.getItem('keysCarrito')?.split(',')
      ids?.push(id.toString())
      ids = ids?.toString()
      window.localStorage.setItem('keysCarrito', ids.toString())
    }
    else
      window.localStorage.setItem('keysCarrito', id.toString())
  }
}
