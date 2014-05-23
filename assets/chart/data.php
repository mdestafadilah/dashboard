<?php

echo '
<chart manageResize="1" origW="350" origH="200"  palette="2" bgAlpha="0" bgColor="FFFFFF" lowerLimit="0" upperLimit="100" numberSuffix="%" showBorder="0" basefontColor="FFFFDD" chartTopMargin="5" chartBottomMargin="5" 
toolTipBgColor="009999" gaugeFillMix="{dark-10},{light-70},{dark-10}" gaugeFillRatio="3" pivotRadius="8" gaugeOuterRadius="120" gaugeInnerRadius="70%"  
gaugeOriginX="175" gaugeOriginY="170" trendValueDistance="5" tickValueDistance="3" manageValueOverlapping="1" autoAlignTickValues="1">
   <colorRange>
      <color minValue="0" maxValue="45" code="FF654F"/>
      <color minValue="45" maxValue="80" code="F6BD0F"/>
      <color minValue="80" maxValue="100" code="8BBA00"/>
   </colorRange>
   <dials>
      <dial value="72" rearExtension="10" baseWidth="10"/>
   </dials>
   <trendpoints>
      <point startValue="62" displayValue="Average" useMarker="1" markerRadius="8" dashed="1" dashLen="2" dashGap="2"  />
   </trendpoints>
   <!--Rectangles behind the gauge -->
   <annotations>
      <annotationGroup id="Grp1" showBelow="1" showShadow="1">
         <annotation type="rectangle" x="$chartStartX+5" y="$chartStartY+5" toX="$chartEndX-5" toY="$chartEndY-5" radius="10" fillColor="009999,333333" showBorder="0" />
      </annotationGroup>
   </annotations>
   <styles>
      <definition>
         <style name="RectShadow" type="shadow" strength="3"/>
                 <style name="trendvaluefont" type="font" bold="1" borderColor="FFFFDD"/>
      </definition>
      <application>
         <apply toObject="Grp1" styles="RectShadow" />
                 <apply toObject="Trendvalues" styles="trendvaluefont" />
      </application>
   </styles>
</chart>
';
?>