 <?php
class CM_Clima
{
	private $_condiciones;

    public function obtener($codigo = '418440', $medida = 'c', $lenguaje = 'es')
	{
		$resultado = array();
		Zend_Feed::registerNamespace('yweather','http://xml.weather.yahoo.com/ns/rss/1.0');
        $clima = Zend_Feed::import("http://weather.yahooapis.com/forecastrss?w=$codigo&u=$medida");		
		$condicion = $clima->current()->{'yweather:condition'};
		//$imagen = $clima->image;
		//$item = $clima->item;
		$locacion = $clima->{'yweather:location'};
		$unidades = $clima->{'yweather:units'};		
		CM_Clima::cargarCondiciones();
		$codigoCondicion = $condicion->getDOM()->getAttribute('code');
		$resultado['condicion'] = $this->_condiciones[$lenguaje][$codigoCondicion];
		$resultado['codigo'] = $condicion->getDOM()->getAttribute('code');
		$resultado['ciudad'] = (string)$locacion->getDOM()->getAttribute('city');
		$resultado['temperatura'] = $condicion->getDOM()->getAttribute('temp');
		$resultado['temperatura_medida'] = $unidades->getDOM()->getAttribute('temperature');
		
		foreach ($clima as $item) {
			$descripcion = $item->description;
			$descripcion = explode('<br />', $descripcion);
		}		
		$descripcion = explode('<br />', $descripcion[0]);
		$resultado['imagen'] = $descripcion[0];
		/*
		$resultado['imagen']['width'] = $imagen->width();
		$resultado['imagen']['height'] = $imagen->height();
		$resultado['imagen']['url'] = $imagen->url();		
		*/
		return $resultado;
	}
	
	public function cargarCondiciones()
	{
        $ingles = array('tornado','tropical storm','hurricane','severe thunderstorms',
            'thunderstorms','mixed rain and snow','mixed rain and sleet','mixed snow and sleet',
            'freezing drizzle','drizzle','freezing rain','showers','showers','snow flurries',
            'light snow showers','blowing snow','snow','hail','sleet','dust','foggy','haze',
            'smoky','blustery','windy','cold','cloudy','mostly cloudy (night)','mostly cloudy (day)',
            'partly cloudy (night)','partly cloudy (day)','clear (night)','sunny','fair (night)',
            'fair (day)','mixed rain and hail','hot','isolated thunderstorms','scattered thunderstorms',
            'scattered thunderstorms','scattered showers','heavy snow','scattered snow showers',
            'heavy snow','partly cloudy','thundershowers','snow showers','isolated thundershowers',
            '3200' => 'not available');

        $español = array('tornado','tormenta tropical','huracán','tormentas severas',
            'tormentas eléctricas','lluvia y nieve mezcladas','la lluvia y el granizo mezclado',
            'la nieve y el granizo mezclado','congelación llovizna','llovizna','lluvia helada',
            'duchas','duchas','copos de nieve','nevadas ligeras','la nieve que sopla','nieve',
            'granizo','aguanieve','polvo','brumoso','neblina','ahumado','borrascoso','ventoso',
            'frío','nublado','Parcialmente nublado (noche)','mayormente nublado (día)',
            'parcialmente nublado (noche)','parcialmente nublado (día)','claro (noche)','soleado',
            'justo (noche)','justo (día)','la lluvia y el granizo mezclado','caliente',
            'tormentas eléctricas aisladas','tormentas eléctricas aisladas','tormentas eléctricas aisladas',
            'lluvias aisladas','las fuertes nevadas','nevadas aisladas','las fuertes nevadas',
            'parcialmente nublado','tormentosos','nevadas','tormentosos aislados', '3200' => 'no está disponible');
			
		$this->_condiciones['es'] = $español;
		$this->_condiciones['en'] = $ingles;		
	}
	
}