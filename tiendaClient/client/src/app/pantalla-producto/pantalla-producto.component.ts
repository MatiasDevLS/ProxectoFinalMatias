import { Component, Input, OnInit } from '@angular/core';
import { ProductosService } from '../services/ProductoService/productos.service';
import { ActivatedRoute, Router, RouterModule } from '@angular/router';
import { CartaProductoComponent } from '../carta-producto/carta-producto.component';
import { MatSnackBar, MatSnackBarModule } from '@angular/material/snack-bar';

@Component({
  selector: 'app-pantalla-producto',
  imports: [CartaProductoComponent, MatSnackBarModule,RouterModule],
  templateUrl: './pantalla-producto.component.html',
  styleUrl: './pantalla-producto.component.scss'
})
export class PantallaProductoComponent implements OnInit {
  producto!: any
  productosAleatorios!: any[]

  constructor(public productosService: ProductosService, private route: ActivatedRoute, private snackBar: MatSnackBar,private router: Router ) { }

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
    this.confirmarCarrito()
    if (window.localStorage.getItem('keysCarrito') != null) {
      var ids:any = window.localStorage.getItem('keysCarrito')?.split(',')
      if (ids.includes(id.toString())) return;
      ids?.push(id.toString())
      ids = ids?.toString()
      window.localStorage.setItem('keysCarrito', ids.toString())
    }
    else
      window.localStorage.setItem('keysCarrito', id.toString())
  }

    comprar(id: number) {

    if (window.localStorage.getItem('keysCarrito') != null) {
      var ids:any = window.localStorage.getItem('keysCarrito')?.split(',')
      if (ids.includes(id.toString())) return;
      ids?.push(id.toString())
      ids = ids?.toString()
      window.localStorage.setItem('keysCarrito', ids.toString())
    this.router.navigateByUrl('/carrito');
  }
    else
    {
      window.localStorage.setItem('keysCarrito', id.toString())
      this.router.navigateByUrl('/carrito');
    }
  }
      

    
  
  

  confirmarCarrito() {
    this.snackBar.open('Producto añadido al carrito', 'Cerrar', {
      duration: 3000, // Duración en milisegundos (3 segundos)
      horizontalPosition: 'center', // Posición horizontal (start, center, end, left, right)
      verticalPosition: 'bottom',  // Posición vertical (top, bottom)
    });
}
}
